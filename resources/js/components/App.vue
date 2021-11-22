<template>
    <div  class="row" >
        <div class="col-md-4" v-for="post in posts" :key="post.id">
            <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="https://via.placeholder.com/225x100" alt="Card image cap">
                <div class="card-body">
                    <h3>{{post.title}}</h3>
                <!-- <p class="card-text">{{mb_strimwidth($post->content, 0, 70, "...")}}</p> -->
                <p class="card-text">{{post.content}}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <!-- <a href="{{route('post.show', $post->slug)}}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a> -->
                    <a :href="`/posts/${post.slug}`"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                    </div>
                    <!-- <small class="text-muted">Creato il: {{$post->created_at->format('d/m/Y')}}</small> -->
                    <small class="text-muted">Creato il: {{post.created_at}}</small>
                </div>
                </div>
            </div>
        </div>    
    </div>
    

</template>

<script>
    export default {
        data() {
            return{
                posts: []
            }
        },
        mounted() {
            axios.get('/api/posts')
            .then( (response) => {
                this.posts= response.data.data;
            })
            .catch((error) => {
                // handle error
                console.log(error);
            })
        }
       
    }
</script>
