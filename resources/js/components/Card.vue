<template>
    <div class="bg-white rounded sahdow-md p-3">
      <span class="text-2xl font-bold mb-3 mr-2" v-if="title" v-text="title" />
      <span class="text-sm text-gray-500" v-if="subtitle" v-text="subtitle" />
    </div>
</template>

<script>
  export default {
    name: "Card",
    props: {
      title: String,
      subtitle: String
    }
  }
</script>
