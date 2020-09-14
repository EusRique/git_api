<template>
  <aside class="menu">
    <div class="title">
      Skyfall
    </div>
    <div class="menu-items">
      <router-link to="/admin/user">
        <i class="fa fa-user"></i> Cadastrar Usuário
      </router-link>
      <router-link to="/admin/tag">
        <i class="fa fa-tag"></i> Criar TAG
      </router-link>
      <router-link to="/admin/listTag">
        <i class="fa fa-tag"></i> Listar TAGs
      </router-link>  
    </div>
  </aside>
</template>

<script>

export default {
  name: 'Menu',
}

</script>

<style>
  .menu {
    grid-area: menu;

    background: #282828;
    /* margin: 20px; */
  }

  .title {
    margin-top: 10px;
    color: #FFF;
    font-size: 1.5rem;
    font-weight: 100;
    flex-grow: 1;
    text-align: center;
  }
  
  .menu-items a {
    color: #FFF;
    text-decoration: none;
    margin-top: 10px;
    padding: 10px;
    line-height: initial;
    letter-spacing: 2px;
    
    display: flex;
    justify-content: left;
  }

  .menu-items a:hover {
    text-decoration: none;
    color: #FFF;
    background-color: #363636;
    border-top: 1px solid #daa520;
    border-bottom: 1px solid #daa520;
  }

</style>