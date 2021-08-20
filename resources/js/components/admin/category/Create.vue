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
              v-model="category.name"
              placeholder="Name"
            />
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
      category: {
        name: "",
      },
    };
  },
  methods: {
    create() {
      if (document.getElementById("name").value == "") {
        document.getElementById("error").innerHTML =
          "Trường Name chưa được điền";
        document.getElementById("success").innerHTML = "";
      } else {
        this.axios
          .post("/api/category", this.category)
          .then((result) => {
            document.getElementById("success").innerHTML = result.data.message;
            setTimeout(() => {
              this.$router.push({ name: "CategoryIndexAdmin" });
            }, 2000);
          })
          .catch((err) => {
            console.log(err);
          });
      }
    },
  },
};
</script>

<style scoped>
#success {
  color: green;
}
#error {
  color: red;
}
</style>