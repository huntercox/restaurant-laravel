<template>
	<span class="text-4xl header__logo"><img alt="Artwork by Nora8008" class="relative top-3" src="/images/pizza-logo.png" width="80" height="80" /></span>
</template>
<style>
.header__logo {
  width: 80px;
  height: 80px;
  background: radial-gradient(circle at center,
  white 0%, white 15%,
  rgba(255, 255, 255, 0.96) 15%, rgba(255, 255, 255, 0.96) 25%,
  rgba(255, 255, 255, 0.93) 25%, rgba(255, 255, 255, 0.93) 35%,
  transparent 35%);
  position: relative;
}
.header__logo img {
  position: relative;
  z-index: 2;
}
</style>
