<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-defalt">
                    <div class="panel-footer">
                        <form @submit.prevent.keyup="sent">
                             <div class="form-group">
                                 <input type="text" v-model="message.message" class="form-control">
                             </div>
                             <div class="form-gruop">
                                 <button type="submit" class="btn btn-primary">send</button>
                             </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['user'],
    data() {
        return {
            message: {
                message: '',
                user: this.user
            }
        }
    },
    methods: {
        sent() {
            this.$emit('messagesent', this.message)
            this.message = {}
        }
    }
}
</script>
