import 'font-awesome/css/font-awesome.css'
import Vue from 'vue'

import App from './App'

import store from './config/store'
import router from './config/router'
import './config/bootstrap'
import './config/msgs'

Vue.config.productionTip = false

require('axios').defaults.headers.common['Authorization'] = 'bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU5OTk0NjA2NCwiZXhwIjoxNTk5OTQ5NjY0LCJuYmYiOjE1OTk5NDYwNjQsImp0aSI6IlF2U0tObVVOWlhDS3N1ekMiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.EXFr3Sdal7HUsN-O3FcF08MrIs2nwcym9RBWW0Ih8a0'
new Vue({
  store,
  router,
  render: h => h(App)
}).$mount('#app')