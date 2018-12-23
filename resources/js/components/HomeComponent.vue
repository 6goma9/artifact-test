<template>
  <div class="container">
    <table>
      <tr v-for="hero in heroes" :key="hero.id">
        <td>{{ hero.localized_name }}</td>
      </tr>
    </table>
    <div v-if="!heroes" class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      heroes: null
    };
  },
  mounted() {
    axios.get("api/heroes").then(res => {
      this.heroes = JSON.parse(res.data);
    });
  }
};
</script>
