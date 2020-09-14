<template>
  <header class="header">
    <h1 class="title-header">
      <router-link to="/">{{ title }}</router-link>
    </h1>
    <UserDropdown v-if="!hideUserDropdown" />
  </header>
</template>

<script>
import UserDropdown from './UserDropdown'

export default {
  name: "Header",
  components: { UserDropdown },

  props: {
    title: String,
    hideUserDropdown: Boolean
  },

  computed: {
    icon() {
      return this.$store.state.isMenuVisible ? "fa-angle-left" : "fa-angle-down" 
    }
  }
};
</script>

<style>
  .header {
    grid-area: header;
    background: #FFF;
    /* margin-top: 80px;
    margin-bottom: 30px; */

    display: flex;
    justify-content: center;
    align-items: center;
  }

  .title-header {
    font-size: 1.5rem;
    color: #000;
    font-weight: 100;
    flex-grow: 1;
    text-align: center;
  }

  .title-header a {
    color: #000;
    text-decoration: none;
  }

  .title-header a:hover {
    color: #000;
    text-decoration: none;
  }

  header.header > a.toggle {
    width: 60px;
    height: 100%;
    color: #fff;
    justify-self: flex-start;
    text-decoration: none;

    display: flex;
    justify-content: center;
    align-items: center;
  }

  header.header > a.toggle:hover {
    color: #fff;
    background-color: rgba(0, 0, 0, 0.2);
  }
</style>