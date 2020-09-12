<template>
  <div class="home">
    <PageTitle icon="fa fa-home" main="Dashboard" sub="Skyfall" />
  </div>
</template>

<script>
import PageTitle from "../templates/PageTitle";
import axios from 'axios'
import { baseApiUrl } from '@/global'

export default {
  name: "Home",
  components: { PageTitle },

  data: function() {
    return {
      stat: {}
    }
  },

  methods: {
    getStats() {
      axios.get(`${baseApiUrl}/tag/listTag`).then(res => this.stat = res.data)
    }
  },
  
  mounted() {
    this.getStats()
  }
}
</script>

<style>

</style>