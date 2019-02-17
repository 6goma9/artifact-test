<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="input-group mb-4">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">title</span>
          </div>
          <input
            v-model="title"
            type="text"
            class="form-control"
            placeholder="title"
            aria-label="title"
            aria-describedby="basic-addon2"
          >
        </div>
        <textarea id="editor" name="contents" rows="8" cols="40"></textarea>
        <button v-on:click="submit" type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      title: "",
      contents: ""
    };
  },
  mounted() {
    const simplemde = new SimpleMDE({
      element: document.getElementById("editor"),
      forceSync: true
    });
  },
  methods: {
    submit() {
      axios
        .post("/api/article", {
          contents: document.getElementById("editor").value,
          title: this.title
        })
        .then(res => {
          console.log(res);
        });
    }
  }
};
</script>
