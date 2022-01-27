<template>
    <div>
        <h3>Table Of Note</h3>
        <div class="table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Published</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="note in notes" :key="note.id">
                        <td>
                            <router-link
                                :to="{
                                    name: 'notes.show',
                                    params: { noteSlug: note.slug },
                                }"
                                >{{ note.title }}</router-link
                            >
                        </td>
                        <td>{{ note.subject }}</td>
                        <td>{{ note.published }}</td>
                        <td>
                            <router-link
                                class="btn btn-success"
                                :to="{
                                    name: 'notes.edit',
                                    params: { noteSlug: note.slug },
                                }"
                                >Edit</router-link
                            >
                            <delete-note :endpoint="note.slug" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import DeleteNote from "./Delete.vue";
export default {
    components: {
        DeleteNote,
    },
    data() {
        return {
            notes: [],
        };
    },

    mounted() {
        this.getNotes();
    },

    methods: {
        async getNotes() {
            let { data } = await axios.get("/api/notes");
            this.notes = data.data;
        },
    },
};
</script>
