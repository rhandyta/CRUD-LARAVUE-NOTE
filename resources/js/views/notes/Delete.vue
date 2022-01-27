<template>
    <button ref="destroyNote" @click="destroyNode" class="btn btn-danger">
        Delete
    </button>
</template>

<script>
export default {
    props: ["endpoint"],
    methods: {
        async destroyNode() {
            let q = window.confirm("are us ure?");
            if (q === true) {
                let response = await axios.delete(
                    `/api/notes/${this.endpoint}/delete`
                );
                if (response.status == 200) {
                    this.$toasted.show(response.data.message, {
                        type: "success",
                        duration: 3000,
                    });
                    this.$refs.destroyNote.parentNode.parentNode.remove();
                }
            }
        },
    },
};
</script>
