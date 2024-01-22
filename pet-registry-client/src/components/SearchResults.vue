<template>
    <div class="search-results">
      <ul>
        <li v-for="result in results" :key="result">
          <button @click.prevent="$emit('select-breed', result)">
            {{ result }}
          </button>
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      results: Array,
    },
  };
  </script>
  