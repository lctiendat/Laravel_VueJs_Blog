<template>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card shadow p-5">
        <span id="success"></span>
        <span id="error"></span>
        <form action="">
          <div class="form-group">
            <label for="name"> Name </label>
            <input
              class="form-control"
              type="text"
              v-model="newstype.name"
              placeholder="Name"
            />
          </div>
          <div class="form-group">
            <select
              class="form-control"
              name=""
              id=""
              v-model="newstype.category_id"
            >
              <option value="">Choose</option>
              <option
                v-for="(item, key) in categories"
                :key="key"
                :value="item.id"
              >
                {{ item.name }}
              </option>
            </select>
          </div>
          <div class="form-group">
            <button class="btn btn-primary" id="btn_update" @click.prevent="updateNewsTypeById">
              Done
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      newstype: {
        name: "",
        category_id: "",
        _method: "patch",
      },
      categories: [],
    };
  },
  mounted() {
    this.getNewsTypeById();
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
    getNewsTypeById() {
      this.axios
        .get(`/api/newstype/${this.$route.params.id}`)
        .then((result) => {
          this.newstype.name = result.data.name;
          this.newstype.category_id = result.data.category_id;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    updateNewsTypeById() {
      document.getElementById("btn_update").innerHTML = "Updating...";
      document.getElementById("btn_update").disabled = true;
      document.getElementById("success").innerHTML = "Updating...";
      this.axios
        .post(`/api/newstype/${this.$route.params.id}`, this.newstype)
        .then((result) => {
          setTimeout(() => {
            document.getElementById("btn_update").innerHTML = "Update";
            document.getElementById("btn_update").disabled = false;
            document.getElementById("success").innerHTML = result.data.message;
            setTimeout(() => {
              this.$router.push({ name: "NewsTypeIndexAdmin" });
            }, 2000);
          }, 2000);
        })
        .catch((err) => {
          console.log(err);
        });
    },
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