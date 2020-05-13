<template>
  <div class="mt-6 -mb-1 flex flex-wrap">
    <template v-for="(link, key) in links">
      <div v-if="link.url === null" :key="key" :class="{'ml-auto': link.label === '>'}"
           class="mr-1 mb-1 px-4 py-3 text-sm border rounded text-gray-400">
        {{ link.label }}
      </div>
      <inertia-link v-else :key="key"
                    class="mr-1 mb-1 px-4 py-3 text-sm border rounded hover:bg-white focus:border-teal-600 focus:text-teal-600"
                    :class="{'bg-white': link.active, 'ml-auto': link.label === '>' }"
                    :href="link.url"
      >
        {{ link.label }}
      </inertia-link>
    </template>
  </div>
</template>

<script>
  export default {
    name: "Pagination",
    props: {
      links: Array
    }
  }
</script>
