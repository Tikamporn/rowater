<?php

namespace Illuminate\Auth;

use Closure;
use InvalidArgumentException;
use Illuminate\Contracts\Auth\Factory as FactoryContract;

class AuthManager implements FactoryContract
{
    use CreatesUserProviders;

    /**
     * The application instance.
     *
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * The registered custom driver creators.
     *
     * @var array
     */
    protected $customCreators = [];

    /**
     * The array of created "drivers".
     *
     * @var array
     */
    protected $guards = [];

    /**
     * Create a new Auth manager instance.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Attempt to get the guard from the local cache.
     *
     * @param  string  $name
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    public function guard($name = null)
    {
        $name = $name ?: $this->getDefaultDriver();

        return isset($this->guards[$name])
                    ? $this->guards[$name]
                    : $this->guards[$name] = $this->resolve($name);
    }

    /**
     * Resolve the given guard.
     *
     * @param  string  $name
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function resolve($name)
    {
        $config = $this->getConfig($name);

        if (is_null($config)) {
            throw new InvalidArgumentException("Auth guard [{$name}] is not defined.");
        }

        if (isset($this->customCreators[$config['driver']])) {
            return $this->callCustomCreator($name, $config);
        } else {
            return $this->{'create'.ucfirst($config['driver']).'Driver'}($name, $config);
        }
    }

    /**
     * Call a custom driver creator.
     *
     * @param  string  $name
     * @param  array  $config
     * @return mixed
     */
    protected function callCustomCreator($name, array $config)
    {
        return $this->customCreators[$config['driver']]($this->app, $name, $config);
    }

    /**
     * Create a session based authentication guard.
     *
     * @param  string  $name
     * @param  array  $config
     * @return \Illuminate\Auth\SessionGuard
     */
    public function createSessionDriver($name, $config)
    {
        $provider = $this->createUserProvider($config['provider']);

        $guard = new SessionGuard($name, $provider, $this->app['session.store']);

        // When using the remember me functionality of the authentication services we
        // will need to be set the encryption instance of the guard, which allows
        // secure, encrypted cookie values to get generated for those cookies.
        if (method_exists($guard, 'setCookieJar')) {
            $guard->setCookieJar($this->app['cookie']);
        }

        if (method_exists($guard, 'setDispatcher')) {
            $guard->setDispatcher($this->app['events']);
        }

        if (method_exists($guard, 'setRequest')) {
            $guard->setRequest($this->app->refresh('request', $guard, 'setRequest'));
        }

        return $guard;
    }

    /**
     * Create a token based authentication guard.
     *
     * @param  string  $name
     * @param  array  $config
     * @return \Illuminate\Auth\TokenGuard
     */
    public function createTokenDriver($name, $config)
    {
        // The token guard implemetns a basic API token based guard implementation
        // that takes an API token field from the request and matches it to the
        // user in the database or another persistence layer where users are.
        $guard = new TokenGuard(
            $this->createUserProvider($config['provider']),
            $this->app['request']
        );

        $this->app->refresh('request', $guard, 'setRequest');

        return $guard;
    }

    /**
     * Get the guard configuration.
     *
     * @param  string  $name
     * @return array
     */
    protected function getConfig($name)
    {
        return $this->app['config']["auth.guards.{$name}"];
    }

    /**
     * Get the default authentication driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->app['config']['auth.defaults.guard'];
    }

    /**
     * Set the default guard driver the factory should serve.
     *
     * @param  string  $name
     * @return void
     */
    public function shouldUse($name)
    {
        return $this->setDefaultDriver($name);
    }

    /**
     * Set the default authentication driver name.
     *
     * @param  string  $name
     * @return void
     */
    public function setDefaultDriver($name)
    {
        $this->app['config']['auth.defaults.guard'] = $name;
    }

    /**
     * Register a new callback based request guard.
     *
     * @param  string  $driver
     * @param  callable  $callback
     * @return $this
     */
    public function viaRequest($driver, callable $callback)
    {
        return $this->extend($driver, function () use ($callback) {
            $guard = new RequestGuard($callback, $this->app['request']);

            $this->app->refresh('request', $guard, 'setRequest');

            return $guard;
        });
    }

    /**
     * Register a custom driver creator Closure.
     *
     * @param  string  $driver
     * @param  \Closure  $callback
     * @return $this
     */
    public function extend($driver, Closure $callback)
    {
        $this->customCreators[$driver] = $callback;

        return $this;
    }

    /**
     * Register a custom provider creator Closure.
     *
     * @param  string  $name
     * @param  \Closure  $callback
     * @return $this
     */
    public function provider($name, Closure $callback)
    {
        $this->customProviderCreators[$name] = $callback;

        return $this;
    }

    /**
     * Dynamically call the default driver instance.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->guard(), $method], $parameters);
    }
}
