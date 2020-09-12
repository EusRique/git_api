<template>
  <div class="tag-admin">
    <hr />
    <h3>Lista de Tags cadastradas</h3>
    <b-row>
      <b-col cols="8">
        <b-form-input
          id="usernameGit"
          type="text"
          v-model="user.usernameGit"
          required
          placeholder="Informe o username da conta"
        />
      </b-col>
      <b-col cols="4">
        <b-button variant="success" @click="searchRepositorie">Buscar</b-button>
      </b-col>
    </b-row>
    <hr />
    <template v-if="loading">
      <Loading />
    </template>
    <template v-else>
      <div class="form-tag" v-if="showFormTag">
        <h4>Confirme as informações abaixo para criação da TAG</h4>
        <b-form>
          <input id="tag-id" type="hidden" v-model="tag.id" />
          <b-form-group label="Username conta GIT:" label-for="tag-owner">
            <b-form-input
              id="tag-owner"
              type="text"
              v-model="tag.owner"
              required
              placeholder="Username da conta"
            />
          </b-form-group>
          <b-form-group label="Repositório" label-for="tag-repo">
            <b-form-input
              id="tag-repo"
              type="text"
              v-model="tag.repo"
              required
              placeholder="Informe o repositório"
            />
          </b-form-group>
          <b-form-group label="Token de Autorização" label-for="tag-token_git">
            <b-form-input
              id="tag-token_git"
              type="text"
              v-model="tag.token_git"
              required
              placeholder="Informe o token"
            />
            <b-form-text
              id="tag-token_git"
            >o Token deve ser gerado em sua conta do GitHub em Settings | Developer settings | Personal access tokens</b-form-text>
          </b-form-group>
          <b-form-group label="Nome da TAG" label-for="tag-tag_name">
            <b-form-input
              id="tag-tag_name"
              type="text"
              v-model="tag.tag_name"
              required
              placeholder="Informe o nome da TAG"
            />
          </b-form-group>
          <b-form-group label="Descrição da TAG" label-for="tag-body">
            <b-form-input
              id="tag-body"
              type="text"
              v-model="tag.body"
              placeholder="Informe o nome da TAG"
            />
          </b-form-group>
          <b-button variant="success" @click="save">
            Criar TAG
          </b-button>
          <b-button class="ml-2" @click="reset">Cancelar</b-button>
        </b-form>
      </div>
      <b-table hover striped :items="repositories" :fields="fields" v-if="showTable">
        <template slot="actions">
          <b-button variant="warning" class="mr-2">
            <i class="fa fa-pencil"></i>
          </b-button>
        </template>
      </b-table>
    </template>
  </div>
</template>

<script>
import { baseApiUrl, showError } from "@/global";
import Loading from "@/components/templates/Loading";
import axios from "axios";

export default {
  name: "ListTagsAdmin",
  components: { Loading },

  data: function () {
    return {
      loading: false,
      showTable: false,
      showFormTag: false,
      user: {
        usernameGit: "",
      },
      tag: {
        owner: "",
        repo: "",
        token_git: "",
        tag_name: "",
        body: "",
      },
      tags: [],
      repositories: [],
      fields: [
        { key: "title", label: "Repositório", sortable: true },
        { key: "description", label: ":Descrição", sortable: true },
        { key: "language", label: "Stacks", sortable: true },
        { key: "username", label: "Username", sortable: true },
        { key: "url", label: "URL", sortable: true },
        { key: "actions", label: "Ações" },
      ],
    };
  },

  methods: {
    searchRepositorie() {
      this.loading = true;
      axios
        .post(`${baseApiUrl}/repositories/searchRepositories`, this.user)
        .then((res) => {
          this.repositories = res.data;
          this.$toasted.global.defaultSuccess(this.repositories.message);
          this.loading = false;
          this.showTable = true;
          this.showFormTag = true;
        })
        .catch((error) => {
          this.loading = false;
          this.showTable = false;
          this.showFormTag = false;
          showError(error.response.data.message);
        });
    },

    save() {
      this.loading = true;
      axios.post(`${baseApiUrl}/tag/createTag`, this.tag)
        .then((res) => {
          this.$toasted.global.defaultSuccess(res.data.message);
          this.loading = false;
          this.reset();
        })
        .catch((error) => {
          this.loading = false;
          showError(error.response.data.message);
        });
    },

    reset() {
      this.tag = {}
    }
  }
};
</script>

<style>
  .form-tag {
    margin-bottom: 15px;
  }
</style>