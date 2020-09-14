<template>
  <div class="content">
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'Content'
}
</script>

<style>
  .content {
    grid-area: content;
    /* margin-top: 40px; */

    background-color: #FFF;
    padding: 20px;
  }
</style>