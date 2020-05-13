<template>
    <div class="flex items-center">
      <div class="flex w-full bg-white shadow rounded">
        <div class="px-4 md:px-6 rounded-l border-r bg-gray-100 flex items-center">
          <span class="text-gray-700 inline">Filter</span>
        </div>
        <input :type="type" class="relative w-full form-input rounded-r rounded-l-none"
               autocomplete="off" :name="name" :placeholder="placeholder" :value="value"
               @input="$emit('input', $event.target.value)"
        >
      </div>
      <button class="ml-3 text-sm text-gray-500 hover:text-gray-700 focus:text-teal-500"
              type="button" @click="$emit('reset')" v-text="resetText"
      />
    </div>
</template>

<script>
  export default {
    name: "SearchFilter",
    props: {
      type: {
        type: String,
        default() { return 'text' }
      },
      value: String,
      name: {
        type: String,
        default() { return 'search' }
      },
      placeholder: {
        type: String,
        default() { return 'Search...' }
      },
      resetText: {
        type: String,
        default() { return 'Clear' }
      }
    }
  }
</script>
