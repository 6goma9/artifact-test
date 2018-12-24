<template>
  <div class="container">
    <table v-if="heroes" class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">name</th>
          <th scope="col">primary attribute</th>
          <th scope="col">role</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="hero in heroes" :key="hero.id">
          <th scope="row">{{ hero.id }}</th>
          <td>{{ hero.localized_name }}</td>
          <td>{{ hero.primary_attr }}</td>
          <td>
            <div v-for="(role, idx) in hero.roles" :key="idx">
              <span>{{ role }}</span>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <div v-else class="d-flex justify-content-center">
      <div class="spinner-border m-5 text-primary" role="status">
        <span class="sr-only">Loading...</span>
      </div>
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
