<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ลงทะเบียนลูกค้า</title>
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  <script src="//code.angularjs.org/snapshot/angular.min.js"></script>
  <script>
    var app = angular.module('myApp', [], function($interpolateProvider) {
      $interpolateProvider.startSymbol('[[');
      $interpolateProvider.endSymbol(']]');
    });
    app.controller('StaticCtrl', AjaxCtrl );
    app.controller('StaticCtrl', StaticCtrl );
    function AjaxCtrl($scope) {
      $scope.zones = ['กะทู้', 'เมือง'];
      $scope.$watch('zone', function(newVal) {
        if (newVal) $scope.teams = ['team1', 'team2'];
      }); }
    function StaticCtrl($scope) {
      $scope.zones = {
        'กะทู้': {
          'team2': ['SOMA', 'Richmond', 'Sunset'],
          'team3': ['Burbank', 'Hollywood']
        },
        'เมือง': {
          'team1': ['igloo', 'cave'],
          'team2': ['Phuket', 'Bangkok']
        }
      };
    }
    app.controller('myCtrl', function($scope) {

        $scope.products = [
            {model : "250 ml", price : '25'},
            {model : "200 ml", price : '20'},
        ];
    });
  </script>
</head>
<body>
	<div class="w3-row">
			<div class="w3-col m1 s1"><p></p></div>
			<div class="w3-col m10 s10 w3-large" ng-app="myApp" ng-controller="StaticCtrl"> 
				<br><br>
				<div class="w3-bottombar w3-border-blue">
          <button onclick="document.getElementById('id02').style.display='block'" class="w3-btn w3-indigo w3-round-large w3-right">เลือกสินค้า</button>
					<h2 class="w3-text-blue">ลงทะเบียนลูกค้า</h2>

				</div>
				<br>
				<h3 class="w3-container w3-text-blue">ข้อมูลลูกค้า</h3>
					<br>
					<table class="w3-table">
						          <tr>
                          <td class="w3-right">รหัสลูกค้า :</td>
                          <td><input class="w3-border w3-round w3-input w3-left" name="id" type="text" placeholder="c001"></td>

                          <td class="w3-right">ชื่อลูกค้า :</td>
                          <td><input class="w3-border w3-round w3-input w3-left" name="name" type="text" placeholder="บริษัทขายดี"></td>
                      </tr>

                      <tr>
                        <td class="w3-right">โซน :</td>
                        <td><select class="w3-select w3-border w3-round w3-left" id="zone" ng-model="teams" ng-options="zone for (zone, teams) in zones">
                                <option value=''>Select</option>
                              </select>
                        </td>

                        <td class="w3-right">ทีม :</td>
                        <td><select class="w3-select w3-border w3-round w3-left" id="city" ng-disabled="!teams" ng-model="suburbs" ng-options="city for (city, suburbs) in teams"><option value=''>Select</option></select>
                        </td>
                      </tr>

                      <tr>
                          <td class="w3-right">สถานะ :</td>
                          <td>
                            <select class="w3-select w3-border w3-round w3-left" name="status">
                              <option value="1">Active</option>
                            </select>
                          </td>

                          <td class="w3-right"><label class="w3-text-red"><b>*</b></label>กลุ่มลูกค้า :</td>
                          <td> 
                            <select class="w3-select w3-border w3-left" name="group">
                              <option value="" disabled selected>เลือกกลุ่ม</option>
                              <option value="1">Group A</option>
                              <option value="2">Group B</option>
                              <option value="3">Group C</option>
                            </select>
                          </td>
                      </tr>

                        <tr>
                          <td class="w3-right"><label class="w3-text-red"><b>*</b></label>Payment Term :</td>
                          <td>
                            <select class="w3-select w3-border w3-round w3-left" name="payment">
                              <option value="1">เครดิต</option>
                              <option value="1">เงินสด</option>
                            </select>
                          </td>

                          <td class="w3-right">รอบวันที่จ่ายเงิน :</td>
                          <td>
                            <div class="w3-row">
                            	<div class="w3-col m1 s1"><p></p></div>
                              	<div class="w3-col m2 s2"><input type="radio" name="date" value="1" checked class="w3-radio"></div>
                             	<div class="w3-col m1 s1">1</div>
                              	<div class="w3-col m2 s2"><p></p></div>
                              	<div class="w3-col m2 s2"><input type="radio" name="date" value="25" checked class="w3-radio"></div>
                              	<div class="w3-col m1 s1">25</div>
                            </div>   
                          </td>
                       </tr>  

                       <tr>
                          <td class="w3-right">มัดจำ (หน่วย) :</td>
                          <td><input class="w3-border w3-round w3-input w3-left" name="unit" type="text" placeholder="1 ขวด"></td>

                          <td class="w3-right">มัดจำ (บาท) :</td>
                          <td><input class="w3-border w3-round w3-input w3-left" name="baht" type="text" placeholder="70 บาท"></td>
                        </tr>

                      <tr>
                          <td class="w3-right">ภาษี :</td>
                          <td><input class="w3-border w3-round w3-input w3-left" name="vat" type="text" placeholder="7%"></td>

                          <td class="w3-right">หมายเลขการส่ง :</td>
                          <td ><input class="w3-border w3-round w3-input w3-left" name="shipnumber" type="text" placeholder="123456789"></td>
                      </tr>

                      <tr>
                          <td class="w3-right">ละติจูด :</td>
                          <td><input class="w3-border w3-round w3-input w3-left" name="Latituge" type="text" placeholder="7° 58' 17' N"></td>

                          <td class="w3-right">ลองติจูด :</td>
                          <td><input class="w3-border w3-round w3-input w3-left" name="longitude" type="text" placeholder="98° 21' 4' E"></td>
                      </tr>
					</table>
					<br>
				<h3 class="w3-container w3-text-blue">ที่อยู่ลูกค้า</h3>
					<br>
					<table class="w3-table">
						          <tr>
                          <td class="w3-right">บ้านเลขที่ :</td>
                          <td><input class="w3-border w3-round w3-input w3-left" name="number" type="text"></td>

                          <td class="w3-right">หมู่ที่ :</td>
                          <td><input class="w3-border w3-round w3-input w3-left" name="vno" type="text"></td>
                      </tr>

                      <tr>
                          <td class="w3-right">ชื่อหมู่บ้าน :</td>
                          <td><input class="w3-border w3-round w3-input" name="village" type="text"></td>

                          <td class="w3-right">ตรอก/ซอย :</td>
                          <td><input class="w3-border w3-round w3-input w3-left" name="lane" type="text"></td>
                      </tr>

                      <tr>
                          <td class="w3-right">ถนน :</td>
                          <td><input class="w3-border w3-round w3-input w3-left" name="road" type="text"></td>

                          <td class="w3-right">ตำบล/แขวง :</td>
                          <td><input class="w3-border w3-round w3-input w3-left" name="subdistrict" type="text"></td>
                      </tr>

                      <tr>
                          <td class="w3-right">อำเภอ/เขต :</td>
                          <td><input class="w3-border w3-round w3-input w3-left" name="district" type="text"></td>

                          <td class="w3-right">จังหวัด :</td>
                          <td>
                            <select class="w3-select w3-border w3-left" name="option">
                              <option value="" disabled selected>เลือกจังหวัด</option>
                              <option value="1">ภูเก็ต</option>
                            </select>
                          </td>
                      </tr>

                      <tr>
                          <td class="w3-right">รหัสไปรษณีย์่ :</td>
                          <td><input class="w3-border w3-round w3-input w3-left" name="pcode" type="text"></td>

                          <td class="w3-right">เบอร์โทร :</td>
                          <td><input class="w3-border w3-round w3-input w3-left" name="subdistrict" type="text"></td>
                      </tr>
					</table>
          <br><br><br>

          <div id="id02" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-container">
                  <span onclick="document.getElementById('id02').style.display='none'" class="w3-closebtn">&times;</span>
                  <br><br>
                    
                  <div ng-app="myApp"> 
                    <div ng-controller="myCtrl" ng-init="quantity=1;product.price=''" class="w3-container">
                      <div class="w3-row">
                        <div class="w3-col l2 m1 s1">
                          <p></p>
                        </div>
                        <div class="w3-col l8 m10 s10">
                            <div class="w3-panel w3-border w3-round-xlarge w3-border-blue" >
                                <br><br>

                                    <table class="w3-table">
                                    <tr>
                                      <td class="w3-right">เลือกสินค้า : </td>
                                      <td><select class="w3-select w3-border w3-left" ng-model="product" ng-options="x.model for x in products" name="Product"></select></td>
                                    </tr>

                                    <tr>
                                      <td class="w3-right">จำนวน : </td>
                                      <td><input class="w3-border w3-round w3-input w3-left" ng-model="quantity" name="quantity" type="text"></td>
                                    </tr>

                                    <tr>
                                      <td class="w3-right">ราคา : </td>
                                      <td>[[product.price * quantity]]</td>
                                    </tr>

                                    <tr>
                                      <td class="w3-right">วันที่ส่ง :</td>
                                      <td><input type="date" name="date"></td>
                                    </tr>

                                    <tr>
                                      <td class="w3-right">จัดส่ง  :</td>
                                      <td>
                                        <select class="w3-select w3-border w3-left" name="option">
                                          <option value="" disabled selected>เลือกรอบการส่ง</option>
                                          <option value="1">ทุก 7 วัน</option>
                                          <option value="1">ทุก 15 วัน</option>
                                          <option value="1">ทุก 1 เดือน</option>
                                           </select></td>
                                    </tr>
                                    <tr>
                                      <td></td>
                                      <td><input type="submit" id="submit" value="Submit" class="w3-btn"/></td>
                                    </tr>
                                  </table>
                                <br><br>
                            </div>
                        </div>
                      </div>
                    
                    <br><br>
                    
                    
                      <div class="w3-row">
                        <div class="w3-col m1 s1"><p></p></div>
                        <div class="w3-col m10 s10">
                            <table class="w3-table w3-centered" border=1>
                                <tr>
                                    <th>สินค้า</th>
                                    <th style="width: 10%">จำนวน</th>
                                    <th style="width: 20%">วันที่จัดส่ง</th>
                                    <th style="width: 20%">รอบการจัดส่ง</th>
                                    <th style="width: 10%">ลบข้อมูล</th>
                                </tr>
                                <tr ng-repeat="company in companies">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                        <div class="w3-col m1 s1"><p></p></div>
                      </div>
                  </div>  
                </div>

                  <br>

                </div>
            </div>
          <br>
				</div>

				<div class="w3-col m4 s4"><p></p></div>
				<div class="w3-col m4 s4">
					<button class="w3-btn w3-round w3-green w3-xlarge w3-padding-xlarge w3-left" name="submit">บันทึก</button>
					<button class="w3-btn w3-round w3-red w3-xlarge w3-padding-xlarge w3-right" name="submit">ย้อนกลับ</button>
				</div>
				<div class="w3-col m4 s4"><p></p></div>
			</div>
			<div class="w3-col m1 s1"><p></p></div>
		</div>
</body>
</html>