<template>
  <div class="admin-pages">
    <PageTitle icon="fa fa-cogs" main="Administração do Sistema" sub="Cadastros & Cia" />
    <div class="admin-pages-tabs">
      <b-card no body>
        <b-tabs card>
          <b-tab title="Usuários" active>
            <UserAdmin />
          </b-tab>
          <b-tab title="Tags">
            <TagAdmin />
          </b-tab>
          <b-tab title="Lista de Tags">
            <ListTagsAdmin />
          </b-tab>
        </b-tabs>
      </b-card>
    </div>
  </div>
</template>

<script>
import PageTitle from "../templates/PageTitle";
import UserAdmin from "./UserAdmin";
import TagAdmin from "./TagAdmin";
import ListTagsAdmin from "./ListTagsAdmin";

export default {
  name: "AdminPages",
  components: { PageTitle, UserAdmin, TagAdmin, ListTagsAdmin },
};
</script>

<style lang="">
</style>