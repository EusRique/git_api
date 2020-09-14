<template>
  <div class="user-admin">
    <h3>Usuários do Sistema</h3>
    <b-form>
      <input id="user-id" type="hidden" v-model="user.id" />
      <b-row>
        <b-col md="6" sm="12">
          <b-form-group label="Nome:" label-for="user-name">
            <b-form-input
              id="user-name"
              type="text"
              v-model="user.name"
              required
              placeholder="Informe o nome do Usuário..."
            />
          </b-form-group>
        </b-col>
        <b-col md="6" sm="12">
          <b-form-group label="E-mail:" label-for="user-email">
            <b-form-input
              id="user-email"
              type="text"
              v-model="user.email"
              required
              placeholder="Informe o e-mail do Usuário..."
            />
          </b-form-group>
        </b-col>
      </b-row>
      <b-row v-show="mode === 'save'">
        <b-col md="6" sm="12">
          <b-form-group label="Senha:" label-for="user-password">
            <b-form-input
              id="user-password"
              type="password"
              v-model="user.password"
              required
              placeholder="Informe a senha do Usuário..."
            />
          </b-form-group>
        </b-col>
      </b-row>
      <b-row>
        <b-col xs="12">
          <b-button variant="primary" v-if="mode === 'save'" @click="save">Salvar</b-button>
          <b-button class="ml-2" @click="reset">Cancelar</b-button>
        </b-col>
      </b-row>
    </b-form>
    <hr />
    <b-table hover striped :items="users" :fields="fields">
      <template slot="actions" slot-scope="data">
        <b-button variant="warning" @click="loadUser(data.item)" class="mr-2">
          <i class="fa fa-pencil"></i>
        </b-button>
      </template>
    </b-table>
  </div>
</template>

<script>
import { baseApiUrl, showError } from "@/global";
import axios from "axios";

export default {
  name: "UserAdmin",

  data: function () {
    return {
      mode: "save",
      user: {
        name: "",
        email: "",
        password: "",
      },
      users: [],
      fields: [
        { key: "id", label: "Código", sortable: true },
        { key: "name", label: ":Nome", sortable: true },
        { key: "email", label: "E-mail", sortable: true },
        { key: "actions", label: "Ações" },
      ],
    };
  },

  methods: {
    async loadUsers() {
      try {
        const url = `${baseApiUrl}/user/listUser`;
        const response = await axios.get(url);
        this.users = response.data.data;
      } catch (error) {
        // eslint-disable-next-line no-console
        console.error(error);
      }
    },

    reset() {
      (this.mode = "save"), (this.user = {}), this.loadUsers();
    },

    save() {
      const method = this.user.id ? "put" : "post";
      const id = this.user.id ? `/updateUser/${this.user.id}` : "/createUser";

      axios[method](`${baseApiUrl}/user${id}`, this.user)
        .then((res) => {
          const response = res.data.message;
          this.$toasted.global.defaultSuccess(response);
          this.reset();
        })
        .catch(showError);
    },

    loadUser(user, mode = "save") {
      this.mode = mode;
      this.user = { ...user };
    },
  },

  mounted() {
    this.loadUsers();
  },
};
</script>

<style>
</style>