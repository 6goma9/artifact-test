<template>
  <div class="container">
    <div class="row">
      <div class="col-md-9">
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
      <div class="col-md-3"></div>
    </div>
    <div
      id="completed"
      class="toast"
      style="position:absolute; top: 56px; right: 0;"
      role="alert"
      aria-live="assertive"
      aria-atomic="true"
    >
      <div class="toast-header">
        <strong class="mr-auto">記事の投稿に成功しました。</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
    <div
      id="failed"
      class="toast"
      style="position:absolute; top: 56px; right: 0;"
      role="alert"
      aria-live="assertive"
      aria-atomic="true"
    >
      <div class="toast-header">
        <strong class="mr-auto">記事の投稿に失敗しました</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      title: "",
      contents: "",
      simplemde: null
    };
  },
  mounted() {
    this.simplemde = new SimpleMDE({
      element: document.getElementById("editor"),
      forceSync: true,
      spellChecker: false,
      toolbar: [
        "bold",
        "italic",
        "code",
        "quote",
        "unordered-list",
        "ordered-list",
        "link",
        "image",
        "table",
        "horizontal-rule",
        "|",
        "preview",
        "guide"
      ]
    });
    $(".toast").toast({ animation: true, autohide: true, delay: 1000 });
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
          $("#completed").toast("show");
          this.title = "";
          this.simplemde.value("");
        })
        .catch(err => {
          console.log(err);
          $("#failed").toast("show");
        });
    }
  }
};
</script>
