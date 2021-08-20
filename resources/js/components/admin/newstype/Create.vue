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
              id="name"
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
            <button class="btn btn-primary" @click.prevent="create">
              Create
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
      },
      categories: "",
    };
  },
  mounted() {
    this.getCategories();
  },
  methods: {
    create() {
      this.axios
        .post("/api/newstype", this.newstype)
        .then((result) => {
            document.getElementById("success").innerHTML = result.data.message;
            setTimeout(() => {
              this.$router.push({ name: "NewsTypeIndexAdmin" });
            }, 2000);
          })
        .catch((err) => {
          console.log(err);
        });
    },
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