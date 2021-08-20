<template>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      <router-link
        tag="button"
        class="btn btn-primary float-right"
        :to="{ name: 'NewsTypeCreateAdmin' }"
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
              <th>Category</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#ID</th>
              <th>Name</th>
              <th>Category</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            <tr v-for="(item, key) in newsTypes" :key="key">
              <th>{{ item.id }}</th>
              <th>{{ item.name }}</th>
              <th>{{ getNameCategoryById(item.category_id) }}</th>
              <th>
                <div class="row">
                  <div class="col-md-6">
                    <router-link
                      tag="i"
                      class="fas fa-pen"
                      :to="{
                        name: 'NewsTypeEditAdmin',
                        params: { id: item.id },
                      }"
                    ></router-link>
                  </div>
                  <div class="col-md-6">
                    <i
                      class="fa fa-trash"
                      @click.prevent="deleteNewsType(item.id)"
                    ></i>
                  </div>
                </div>
              </th>
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
      newsTypes: [],
    };
  },
  mounted() {
    this.getCategories();
    this.getNewsTypes();
    this.getNameCategoryById();
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
    getNewsTypes() {
      this.axios
        .get("/api/newstype")
        .then((response) => {
          this.newsTypes = response.data;
        })
        .catch((error) => {
          console.log(error);
          this.newsTypes = [];
        });
    },
    deleteNewsType(id) {
      this.axios
        .delete(`/api/newstype/${id}`)
        .then((result) => {
          document.getElementById("success").innerHTML = result.data.message;
          this.getNewsTypes();
        })
        .catch((err) => {
          document.getElementById("success").innerHTML = "";
          document.getElementById("error").innerHTML = "Có lỗi xảy ra";
          console.log(err);
        });
    },
    getNameCategoryById(id) {
      for (let i = 0; i < this.categories.length; i++) {
        if (id == this.categories[i].id) {
          return this.categories[i].name;
        }
      }
    },
  },
  computed: {
    //    getNameCategoryById(id) {
    //   this.categories.forEach((category, index) => {
    //     console.log(index);
    //   });
    // },
  },
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