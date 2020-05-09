<template>
  <div>
    <portal-target name="dropdown" slim />
    <div class="flex flex-col">
      <div class="h-screen flex flex-col" @click="hideDropdownMenus">
        <div class="md:flex flex-shrink-0">
          <div class="bg-teal-600 md:flex-shrink-0 md:w-56 px-6 py-4 flex items-center justify-between md:justify-center">
            <inertia-link class="mt-1" href="/">
              <logo class="fill-white" width="120" height="28" />
            </inertia-link>
            <dropdown class="md:hidden" placement="bottom-end">
              <svg class="fill-white w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
              </svg>
              <div slot="dropdown" class="mt-2 px-8 py-4 shadow-lg rounded menu-background">
                <main-menu :url="url()" />
              </div>
            </dropdown>
          </div>
          <div class="bg-white border-b w-full p-4 md:py-0 md:px-12 text-sm md:text-md flex justify-between items-center">
            <div class="mt-1 mr-4">LARAVEL INERTIAJS APP</div>
            <dropdown class="mt-1" placement="bottom-end">
              <div class="flex items-center cursor-pointer select-none group">
                <div class="dropdown-trigger">
                  <span>{{ $page.auth.user.name }}</span>
                </div>
                <icon class="dropdown-action" name="expand_more" />
              </div>
              <div slot="dropdown" class="dropdown">
                <inertia-link class="dropdown-item" :href="'#'">My Profile</inertia-link>
                <inertia-link class="dropdown-item" :href="route('logout')" method="post">Logout</inertia-link>
              </div>
            </dropdown>
          </div>
        </div>
        <div class="flex flex-grow overflow-hidden">
          <main-menu :url="url()" class="menu-background flex-shrink-0 w-56 p-12 hidden md:block overflow-y-auto" />
          <div class="flex-1 px-4 py-8 md:p-12 overflow-y-auto" scroll-region>
            <notify />
            <slot />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Dropdown from '@/components/Dropdown'
import FlashMessages from '@/components/FlashMessages'
import Notify from "@/components/Notify"
import Icon from '@/components/Icon'
import Logo from '@/components/Logo'
import MainMenu from '@/components/MainMenu'

export default {
  components: {
    Dropdown,
    FlashMessages,
    Icon,
    Logo,
    MainMenu,
    Notify
  },
  data() {
    return {
      showUserMenu: false,
      accounts: null,
    }
  },
  methods: {
    url() {
      return location.pathname.substr(1)
    },
    hideDropdownMenus() {
      this.showUserMenu = false
    },
  },
}
</script>
