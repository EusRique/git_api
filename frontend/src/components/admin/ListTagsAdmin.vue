<template>
  <div class="list-tag-admin">
    <template v-if="loading">
      <Loading />
    </template>
    <template v-else>
       <h3>Lista de Tags cadastradas</h3>
    <b-form v-if="checkEdit">
      <input id="tag-id" type="hidden" v-model="tag.id" />
      <b-form-group label="Username conta GIT:" label-for="tag-owner">
        <b-form-input
          id="tag-owner"
          type="text"
          v-model="tag.login"
          required
          readonly
          placeholder="Username da conta"
        />
      </b-form-group>
      <b-form-group label="Repositório" label-for="tag-repo">
        <b-form-input
          id="tag-repo"
          type="text"
          v-model="tag.repositorie"
          required
          readonly
          placeholder="Informe o repositório"
        />
      </b-form-group>
      <b-form-group label="Token de Autorização" label-for="tag-token_git">
        <b-form-input
          id="tag-token_git"
          type="text"
          v-model="tag.token_git"
          required
          :readonly="mode === 'remove'"
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
          :readonly="mode === 'remove'"
          placeholder="Informe o nome da TAG"
        />
      </b-form-group>
      <b-form-group label="Descrição da TAG" label-for="tag-body">
        <b-form-input
          id="tag-body"
          type="text"
          v-model="tag.body"
          :readonly="mode === 'remove'"
          placeholder="Informe o nome da TAG"
        />
      </b-form-group>
      <b-row>
        <b-col xs="12">
          <b-button variant="success" v-if="mode === 'save'" @click="save">Salvar</b-button>
          <b-button variant="danger" v-if="mode === 'remove'" @click="remove">Excluir</b-button>
          <b-button class="ml-2" @click="reset">Cancelar</b-button>
        </b-col>
      </b-row>
    </b-form>
    <hr />
    <b-table hover striped :items="tags" :fields="fields">
      <template slot="actions" slot-scope="data">
        <b-button variant="warning" @click="loadTag(data.item)" class="mr-2">
          <i class="fa fa-pencil"></i>
        </b-button>
        <b-button variant="danger" @click="loadTag(data.item, 'remove')" class="mr-2">
          <i class="fa fa-trash"></i>
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
      mode: "save",
      checkEdit: false,
      loading: true,
      tag: {
        login: "",
        repositorie: "",
        token_git: "",
        tag_name: "",
        body: "",
      },
      tags: [],
      fields: [
        {
          key: "id_tag_repository",
          label: "ID TAG Repositório",
          sortable: true,
        },
        { key: "tag_name", label: "Tag", sortable: true },
        { key: "repositorie", label: "Repositório", sortable: true },
        { key: "target_commitish", label: "Branch", sortable: true },
        { key: "body", label: "Descrição", sortable: true },
        { key: "actions", label: "Ações" },
      ],
    };
  },

  methods: {
    async loadTags() {
      try {
        const url = `${baseApiUrl}/tag/listTag`;
        const response = await axios.get(url);
        this.tags = response.data.data;
        this.loading = false
      } catch (error) {
        // eslint-disable-next-line no-console
        console.error(error);
      }
    },

    save() {
      this.loading = true
      axios
        .patch(
          `${baseApiUrl}/tag/updateTag/${this.tag.id_tag_repository}`,
          this.tag
        )
        .then((res) => {
          const response = res.data.message;
          this.$toasted.global.defaultSuccess(response);
          this.reset();
          this.loading = false
          this.checkEdit = false
        })
        .catch(showError);
    },

    remove() {
      this.loading = true
      const url = `${baseApiUrl}/tag/deleteTag/${this.tag.id_tag_repository}`;
      // eslint-disable-next-line no-console
      console.log(url)
      axios
        .delete(url)
        .then((res) => {
          const response = res.data.message;
          this.$toasted.global.defaultSuccess(response);
          this.reset();
          this.loading = false
          this.checkEdit = false
        })
        .catch(showError);
    },

    reset() {
      (this.mode = "save"), (this.tag = {}), this.loadTags();
    },

    loadTag(tag, mode = "save") {
      this,this.checkEdit = true
      this.mode = mode;
      this.tag = { ...tag };
    },
  },

  mounted() {
    this.loadTags();
  },
};
</script>

<style>
</style>