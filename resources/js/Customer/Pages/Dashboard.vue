<script setup>
import { Head } from '@inertiajs/vue3';
import ResponsiveNavLink from "@/Customer/Components/ResponsiveNavLink.vue";
</script>

<template>
    <Head title="Dashboard" />

    <template v-if="$page.props.auth.user">
        {{ $page.props.auth.user.name }}

        <ResponsiveNavLink :href="route('auth.logout')" method="post" as="button">
            Log Out
        </ResponsiveNavLink>
    </template>
    <template v-else>
        not logged in
    </template>
</template>
