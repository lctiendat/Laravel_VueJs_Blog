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
              v-model="category.name"
              placeholder="Name"
            />
          </div>
          <div class="form-group text-center">
            <button
              id="btn_update"
              class="btn btn-primary"
              @click.prevent="updateCategoryById"
            >
              Update
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
      category: {
        name: "",
        _method: "patch",
      },
    };
  },
  mounted() {
    this.getCategoryById();
  },
  methods: {
    getCategoryById() {
      this.axios
        .get(`/api/category/${this.$route.params.id}`)
        .then((result) => {
          this.category.name = result.data.name;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    updateCategoryById() {
      document.getElementById("btn_update").innerHTML = "Updating...";
      document.getElementById("btn_update").disabled = true;
      document.getElementById("success").innerHTML = "Updating...";
      this.axios
        .post(`/api/category/${this.$route.params.id}`, this.category)
        .then((result) => {
          setTimeout(() => {
            document.getElementById("btn_update").innerHTML = "Update";
            document.getElementById("btn_update").disabled = false;
            document.getElementById("success").innerHTML = result.data.message;
            setTimeout(() => {
              this.$router.push({ name: "CategoryIndexAdmin" });
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