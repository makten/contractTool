<style type="text/css">
    /*
 * Component: Dropdown menus
 * -------------------------
 */
 /*Dropdowns in general*/
 .dropdown-menu {
  box-shadow: none;
  border-color: #eee;
}
.dropdown-menu > li > a {
  color: #777;
}
.dropdown-menu > li > a > .glyphicon,
.dropdown-menu > li > a > .fa,
.dropdown-menu > li > a > .ion {
  margin-right: 10px;
}
.dropdown-menu > li > a:hover {
  background-color: #e1e3e9;
  color: #333;
}
.dropdown-menu > .divider {
  background-color: #eee;
}
.navbar-nav > .notifications-menu > .dropdown-menu,
.navbar-nav > .messages-menu > .dropdown-menu,
.navbar-nav > .tasks-menu > .dropdown-menu {
  width: 280px;
  padding: 0 0 0 0;
  margin: 0;
  top: 100%;
}
.navbar-nav > .notifications-menu > .dropdown-menu > li,
.navbar-nav > .messages-menu > .dropdown-menu > li,
.navbar-nav > .tasks-menu > .dropdown-menu > li {
  position: relative;
}
.navbar-nav > .notifications-menu > .dropdown-menu > li.header,
.navbar-nav > .messages-menu > .dropdown-menu > li.header,
.navbar-nav > .tasks-menu > .dropdown-menu > li.header {
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
  background-color: #ffffff;
  padding: 7px 10px;
  border-bottom: 1px solid #f4f4f4;
  color: #444444;
  font-size: 14px;
}
.navbar-nav > .notifications-menu > .dropdown-menu > li.footer > a,
.navbar-nav > .messages-menu > .dropdown-menu > li.footer > a,
.navbar-nav > .tasks-menu > .dropdown-menu > li.footer > a {
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
  font-size: 12px;
  background-color: #fff;
  padding: 7px 10px;
  border-bottom: 1px solid #eeeeee;
  color: #444 !important;
  text-align: center;
}
@media (max-width: 991px) {
  .navbar-nav > .notifications-menu > .dropdown-menu > li.footer > a,
  .navbar-nav > .messages-menu > .dropdown-menu > li.footer > a,
  .navbar-nav > .tasks-menu > .dropdown-menu > li.footer > a {
    background: #fff !important;
    color: #444 !important;
  }
}
.navbar-nav > .notifications-menu > .dropdown-menu > li.footer > a:hover,
.navbar-nav > .messages-menu > .dropdown-menu > li.footer > a:hover,
.navbar-nav > .tasks-menu > .dropdown-menu > li.footer > a:hover {
  text-decoration: none;
  font-weight: normal;
}
.navbar-nav > .notifications-menu > .dropdown-menu > li .menu,
.navbar-nav > .messages-menu > .dropdown-menu > li .menu,
.navbar-nav > .tasks-menu > .dropdown-menu > li .menu {
  max-height: 200px;
  margin: 0;
  padding: 0;
  list-style: none;
  overflow-x: hidden;
}
.navbar-nav > .notifications-menu > .dropdown-menu > li .menu > li > a,
.navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a,
.navbar-nav > .tasks-menu > .dropdown-menu > li .menu > li > a {
  display: block;
  white-space: nowrap;
  /* Prevent text from breaking */
  border-bottom: 1px solid #f4f4f4;
}
.navbar-nav > .notifications-menu > .dropdown-menu > li .menu > li > a:hover,
.navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a:hover,
.navbar-nav > .tasks-menu > .dropdown-menu > li .menu > li > a:hover {
  background: #f4f4f4;
  text-decoration: none;
}
.navbar-nav > .notifications-menu > .dropdown-menu > li .menu > li > a {
  color: #444444;
  overflow: hidden;
  text-overflow: ellipsis;
  padding: 10px;
}
.navbar-nav > .notifications-menu > .dropdown-menu > li .menu > li > a > .glyphicon,
.navbar-nav > .notifications-menu > .dropdown-menu > li .menu > li > a > .fa,
.navbar-nav > .notifications-menu > .dropdown-menu > li .menu > li > a > .ion {
  width: 20px;
}
.navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a {
  margin: 0;
  padding: 10px 10px;
}
.navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a > div > img {
  margin: auto 10px auto auto;
  width: 40px;
  height: 40px;
}
.navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a > h4 {
  padding: 0;
  margin: 0 0 0 45px;
  color: #444444;
  font-size: 15px;
  position: relative;
}
.navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a > h4 > small {
  color: #999999;
  font-size: 10px;
  position: absolute;
  top: 0;
  right: 0;
}
.navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a > p {
  margin: 0 0 0 45px;
  font-size: 12px;
  color: #888888;
}
.navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a:before,
.navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a:after {
  content: " ";
  display: table;
}
.navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a:after {
  clear: both;
}
.navbar-nav > .tasks-menu > .dropdown-menu > li .menu > li > a {
  padding: 10px;
}
.navbar-nav > .tasks-menu > .dropdown-menu > li .menu > li > a > h3 {
  font-size: 14px;
  padding: 0;
  margin: 0 0 10px 0;
  color: #666666;
}
.navbar-nav > .tasks-menu > .dropdown-menu > li .menu > li > a > .progress {
  padding: 0;
  margin: 0;
}
.navbar-nav > .user-menu > .dropdown-menu {
  border-top-right-radius: 0;
  border-top-left-radius: 0;
  padding: 1px 0 0 0;
  border-top-width: 0;
  width: 280px;
}
.navbar-nav > .user-menu > .dropdown-menu,
.navbar-nav > .user-menu > .dropdown-menu > .user-body {
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
}
.navbar-nav > .user-menu > .dropdown-menu > li.user-header {
  height: 175px;
  padding: 10px;
  text-align: center;
}
.navbar-nav > .user-menu > .dropdown-menu > li.user-header > img {
  z-index: 5;
  height: 90px;
  width: 90px;
  border: 3px solid;
  border-color: transparent;
  border-color: rgba(255, 255, 255, 0.2);
}
.navbar-nav > .user-menu > .dropdown-menu > li.user-header > p {
  z-index: 5;
  color: #fff;
  color: rgba(255, 255, 255, 0.8);
  font-size: 17px;
  margin-top: 10px;
}
.navbar-nav > .user-menu > .dropdown-menu > li.user-header > p > small {
  display: block;
  font-size: 12px;
}
.navbar-nav > .user-menu > .dropdown-menu > .user-body {
  padding: 15px;
  border-bottom: 1px solid #f4f4f4;
  border-top: 1px solid #dddddd;
}
.navbar-nav > .user-menu > .dropdown-menu > .user-body:before,
.navbar-nav > .user-menu > .dropdown-menu > .user-body:after {
  content: " ";
  display: table;
}
.navbar-nav > .user-menu > .dropdown-menu > .user-body:after {
  clear: both;
}
.navbar-nav > .user-menu > .dropdown-menu > .user-body a {
  color: #444 !important;
}
@media (max-width: 991px) {
  .navbar-nav > .user-menu > .dropdown-menu > .user-body a {
    background: #fff !important;
    color: #444 !important;
  }
}
.navbar-nav > .user-menu > .dropdown-menu > .user-footer {
  background-color: #f9f9f9;
  padding: 10px;
}
.navbar-nav > .user-menu > .dropdown-menu > .user-footer:before,
.navbar-nav > .user-menu > .dropdown-menu > .user-footer:after {
  content: " ";
  display: table;
}
.navbar-nav > .user-menu > .dropdown-menu > .user-footer:after {
  clear: both;
}
.navbar-nav > .user-menu > .dropdown-menu > .user-footer .btn-default {
  color: #666666;
}
@media (max-width: 991px) {
  .navbar-nav > .user-menu > .dropdown-menu > .user-footer .btn-default:hover {
    background-color: #f9f9f9;
  }
}
.navbar-nav > .user-menu .user-image {
  float: left;
  width: 25px;
  height: 25px;
  border-radius: 50%;
  margin-right: 10px;
  margin-top: -2px;
}
@media (max-width: 767px) {
  .navbar-nav > .user-menu .user-image {
    float: none;
    margin-right: 0;
    margin-top: -8px;
    line-height: 10px;
  }
}
/* Add fade animation to dropdown menus by appending
the class .animated-dropdown-menu to the .dropdown-menu ul (or ol)*/
.open:not(.dropup) > .animated-dropdown-menu {
  -webkit-backface-visibility: visible !important;
  backface-visibility: visible !important;
  -webkit-animation: flipInX 0.7s both;
  animation: flipInX 0.7s both;
}
@keyframes flipInX {
  0% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    transition-timing-function: ease-in;
    opacity: 0;
  }
  40% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    transition-timing-function: ease-in;
  }
  60% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
    transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
    opacity: 1;
  }
  80% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
    transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
  }
  100% {
    -webkit-transform: perspective(400px);
    transform: perspective(400px);
  }
}
@-webkit-keyframes flipInX {
  0% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    -webkit-transition-timing-function: ease-in;
    opacity: 0;
  }
  40% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    -webkit-transition-timing-function: ease-in;
  }
  60% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
    opacity: 1;
  }
  80% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
  }
  100% {
    -webkit-transform: perspective(400px);
  }
}
/* Fix dropdown menu in navbars */
.navbar-custom-menu > .navbar-nav > li {
  position: relative;
}
.navbar-custom-menu > .navbar-nav > li > .dropdown-menu {
  position: absolute;
  right: 0;
  left: auto;
}
@media (max-width: 991px) {
  .navbar-custom-menu > .navbar-nav {
    float: right;
  }
  .navbar-custom-menu > .navbar-nav > li {
    position: static;
  }
  .navbar-custom-menu > .navbar-nav > li > .dropdown-menu {
    position: absolute;
    right: 5%;
    left: auto;
    border: 1px solid #ddd;
    background: #fff;
  }
}
</style>

<template>

 <!--  <div id="temp_skin">


    <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
      <span><i class="material-icons" :style="{color: skinCode }" style="margin-top: 8px;">arrow_drop_down_circle</i>
        <span class="label label-danger">skin</span>
      </span>

    </a>

    <ul class="dropdown-menu" style="width: 215px; margin: 0px;">


      <li class="header">Select a skin</li>
      <li>

        <ul :class="'menu'" v-for="skin in skins">

          <li @click="changeSkin(skin.color, skin.code)" style="list-style: none; margin: 0px; padding: 0px;"><!-- start blue skins -->
            <!-- <a href="#">
              <div :class="'pull-left'">
                <span  v-html="skin.icon"> </span>                            
              </div>

              <h4>
                {{ skin.name }}
              </h4>

              <p><small>{{ skin.desc }}</small></p>
            </a>
          </li>

        </ul>
      </li>
    </ul>

    </div>  -->
</template>


<script>

  export default {
   props: ['user'],

   data() {
    return {
      skins: [            
      {name: 'Blue', color: 'skin-blue', code: '#3c8dbc', icon: '<i class="fa fa-circle text-blue" style="font-size: 25px;"></i>', desc: 'Changes the color of the navigation bar'},
      {name: 'Light-blue', color: 'skin-blue-light', code: '#3c8dbc', icon: '<i class="fa fa-circle text-light-blue" style="font-size: 25px;"></i>', desc: 'Changes the color of the navigation bar'},
      {name: 'Green', color: 'skin-green', code: '#00a65a', icon: '<i class="fa fa-circle text-success" style="font-size: 25px;"></i>', desc: 'Changes the color of the navigation bar'},
      {name: 'Light-green', color: 'skin-green-light', code: '#00a65a', icon: '<i class="fa fa-circle text-green" style="font-size: 25px;"></i>', desc: 'Changes the color of the navigation bar'},
      {name: 'Red', color: 'skin-red', code: '#dd0506', icon: '<i class="fa fa-circle text-red" style="font-size: 25px;"></i>', desc: 'Changes the color of the navigation bar'},
      {name: 'Light-red', color: 'skin-red-light', code: '#dd0506', icon: '<i class="fa fa-circle text-red" style="font-size: 25px;"></i>', desc: 'Changes the color of the navigation bar'},
      {name: 'Purple', color: 'skin-purple', code: '#605ca8', icon: '<i class="fa fa-circle text-purple" style="font-size: 25px;"></i>', desc: 'Changes the color of the navigation bar'},
      {name: 'Light-purple', color: 'skin-purple-light', code: '#605ca8', icon: '<i class="fa fa-circle text-purple" style="font-size: 25px;"></i>', desc: 'Changes the color of the navigation bar'},
      {name: 'Grey', color: 'skin-grey', code: '#9E9E9E', icon: '<i class="fa fa-circle" style="font-size: 25px; color: #9E9E9E;"></i>', desc: 'Changes the color of the navigation bar'},


      ],


      skinCode: '',
      updateData: {
        'skin': '',
        'skin_color_code': '',
        'user_id': ''
      }

    }
  },

  mounted (){
        this.$nextTick(function(){
            alert('ready');
            // this.getUserSettings();
        })

      },

      methods: {

		/**
		 * Gets the user settings.
		 */
    getUserSettings () {
			// this.$http.get(`/api/user/${this.user.id}/settings`).then( response => {
			// 	this.skinCode = response.data.skin_color_code;
			// })
		},

		/**
		 * Update logged in user settings
		 *		 
		 */
    changeSkin (skin, skin_color)
    {	

      $('#themeColor').attr('href', `http://unikans.dev/css/skins/${skin}.css`)		   

		    // $('#skin-value').val(skin);

       $('#admin_app').removeClass();
       $('#admin_app').addClass('sidebar-mini');
       $('#admin_app').addClass(skin);

       this.updateData.skin = skin;
       this.updateData.skin_color_code = skin_color;
       this.updateData.user_id = this.user.id;


       this.$http.post(`/api/userprofile/${this.user.id}/updateSkin`, this.updateData ).then( k => {

       });

     }
   }

 }

</script>