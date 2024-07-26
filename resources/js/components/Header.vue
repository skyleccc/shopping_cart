<template>
  <b-container fluid class="bg-dark text-white py-3">
    <b-row class="align-items-center">
      <b-col cols="auto">
        <b-img 
          src="https://scontent.fceb6-1.fna.fbcdn.net/v/t39.30808-6/253164628_438577367898864_246071918641166241_n.png?_nc_cat=100&ccb=1-7&_nc_sid=cc71e4&_nc_eui2=AeGDA7KWMpIJcPQ2dn96tlzPjam16vEwerCNqbXq8TB6sGP-WixF9yqBWVKe2DZ92EzQSDbQ42F5dgJkiEsDpI1x&_nc_ohc=Esfs7p_Bul0Q7kNvgG4emx0&_nc_ht=scontent.fceb6-1.fna&oh=00_AYAEN56apjTnNDEaOATcgUt1rTzC-FdM1txyDImJDLMAXw&oe=66A87AF1" 
          alt="GESTOURAGE Logo" 
          class="logo-img" 
        />
      </b-col>
      <b-col>
        <h1 class="mb-0 ml-3">GESTOURAGE</h1>
      </b-col>
      <b-col class="d-flex justify-content-end">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </nav>
      </b-col>
    </b-row>
  </b-container>
</template>


<script>
export default {
  name: 'Header'
}
</script>

<style scoped>
.logo-img {
  max-width: 100px; 
  height: auto; 
}

.navbar-nav .nav-link {
  color: #ffffff !important;
}


.navbar-nav {
  margin-left: auto;
}
</style>
