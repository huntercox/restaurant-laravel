<script setup>
import ApplicationLogo from '@/Customer/Components/ApplicationLogo.vue';
import Dropdown from '@/Customer/Components/Dropdown.vue';
import DropdownLink from '@/Customer/Components/DropdownLink.vue';
import Cart from '@/Customer/Components/Cart.vue';
import { Link } from '@inertiajs/vue3';
import ResponsiveNavLink from "@/Customer/Components/ResponsiveNavLink.vue";
</script>

<template>
  <header>
    <div>
      <nav class="bg-red-500 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="h-16">
            <div class="flex w-full h-full align-center justify-between">
              <div class="flex justify-start">
                <!-- Logo -->
                <div class="shrink-0 flex items-center justify-between">
                  <Link href="/">
                  <ApplicationLogo class="block w-auto fill-current text-gray-800 hover:scale-125 transition-transform" />
                  </Link>
                </div>

                <!-- Main Navigation -->
                <nav class="space-x-8 sm:-my-px sm:ml-10 sm:flex items-center self-center justify-end grow-1">
                  <Link :href="route('menu')" :active="route().current()"
                    class="text-white font-bold px-2 hover:text-gray-700">
                  Menu
                  </Link>
                </nav>
              </div>

              <div class="flex items-center">
                <template v-if="$page?.props?.auth?.user?.name">
                  <div class="flex items-center ml-6 justify-end">
                    <!-- Settings Dropdown -->
                    <div class="ml-3 relative">
                      <Dropdown align="right" width="48">
                        <template #trigger>
                          <span class="inline-flex rounded-md">
                            <button type="button"
                              class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                              {{ $page?.props?.auth?.user?.name }}

                              <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd" />
                              </svg>
                            </button>
                          </span>
                        </template>

                        <template #content>
                          <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                          <DropdownLink :href="route('auth.logout')" method="post" as="button">
                            Log Out
                          </DropdownLink>
                        </template>
                      </Dropdown>
                    </div>
                  </div>
                </template>

                <template v-if="$page.props.auth.user?.roles[0]?.name !== 'admin'">
                  <Cart></Cart>
                </template>
              </div>
            </div>



          </div>
        </div>
      </nav>
    </div>
  </header>
</template>
