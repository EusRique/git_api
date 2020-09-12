import 'font-awesome/css/font-awesome.css'
import Vue from 'vue'

import App from './App'

import store from './config/store'
import router from './config/router'
import './config/bootstrap'
import './config/msgs'

Vue.config.productionTip = false

require('axios').defaults.headers.common['Authorization'] = 'bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU5OTkyMjg1OSwiZXhwIjoxNTk5OTI2NDU5LCJuYmYiOjE1OTk5MjI4NTksImp0aSI6Ikk2WnNOeVdlVnZ6dElsdksiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.W5-zJHVPZP4GvNSwwCdC3h0P_jjxZHd5oxmtwOAObRE'
new Vue({
  store,
  router,
  render: h => h(App)
}).$mount('#app')