import 'font-awesome/css/font-awesome.css'
import Vue from 'vue'

import App from './App'

import store from './config/store'
import router from './config/router'
import './config/bootstrap'
import './config/msgs'

Vue.config.productionTip = false

require('axios').defaults.headers.common['Authorization'] = 'bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU5OTkzOTg2NSwiZXhwIjoxNTk5OTQzNDY1LCJuYmYiOjE1OTk5Mzk4NjUsImp0aSI6ImdtYWtURlc4SktFWVBoa1giLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.rX6rJCFjNzYakluqEg8_bCLvC0Zy2XK-iw9XVTQLfP4'
new Vue({
  store,
  router,
  render: h => h(App)
}).$mount('#app')