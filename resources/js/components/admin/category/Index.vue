<template>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      <router-link
        tag="button"
        class="btn btn-primary float-right"
        :to="{ name: 'CategoryCreateAdmin' }"
        >Create</router-link
      >
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <span id="success"></span>
        <span id="error"></span>
        <table
          class="table table-bordered text-center"
          id="dataTable"
          width="100%"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th>#ID</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#ID</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody v-if="categories.length > 0">
            <tr v-for="(item, key) in categories" :key="key">
              <th>{{ item.id }}</th>
              <th>{{ item.name }}</th>
              <th>
                <div class="row">
                  <div class="col-md-6">
                    <router-link
                      tag="i"
                      class="fas fa-pen"
                      :to="{
                        name: 'CategoryEditAdmin',
                        params: { id: item.id },
                      }"
                    ></router-link>
                  </div>
                  <div class="col-md-6">
                    <i
                      class="fa fa-trash"
                      @click.prevent="deleteCategory(item.id)"
                    ></i>
                  </div>
                </div>
              </th>
            </tr>
          </tbody>
          <tbody v-else>
            <tr class="text-center">
              Data No Found
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      categories: [],
    };
  },
  mounted() {
    this.getCategories();
  },
  methods: {
    getCategories() {
      this.axios
        .get("/api/category")
        .then((response) => {
          this.categories = response.data;
        })
        .catch((error) => {
          console.log(error);
          this.categories = [];
        });
    },
    deleteCategory(id) {
      this.axios
        .delete(`/api/category/${id}`)
        .then((result) => {
          this.getCategories();
          document.getElementById("success").innerHTML = result.data.message;
        })
        .catch((err) => {
          console.log(err);
          document.getElementById("success").innerHTML = "";
          document.getElementById("error").innerHTML = "Có lỗi xảy ra";
        });
    },
  },
  //   computed: {
  //     incrementIndex() {
  //       return this.index++;
  //     },
  //   },
};
</script>

<style>
#success {
  color: green;
}
#error {
  color: red;
}
</style>