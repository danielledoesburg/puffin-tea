

<template>
    <div class="delete-modal-box">
<div class="box-area">
<p>Are you sure that you want to delete your account?</p>
<form action="/account" method="POST">
@method('delete')
@csrf
<button type="submit">Delete account</button>
<button>Cancel</button>
</form>
</div>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>