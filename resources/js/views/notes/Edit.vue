<template>
    <div class="row col-md-6">
        <div class="card">
            <div class="card-header">New Note</div>
            <div class="card-body">
                <form action="#" method="post" @submit.prevent="update">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input
                            v-model="form.title"
                            class="form-control"
                            type="text"
                            id="title"
                        />
                        <div v-if="theErrors.title" class="mt-2 text-danger">
                            {{ theErrors.title[0] }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <select
                            @change="selectedSubject"
                            class="form-select"
                            id="subject"
                        >
                            <option
                                :value="form.subjectId"
                                v-text="form.subject"
                            ></option>
                            <template v-for="subject in subjects">
                                <option
                                    v-if="form.subjectId !== subject.id"
                                    :key="subject.id"
                                    :value="subject.id"
                                >
                                    {{ subject.name }}
                                </option>
                            </template>
                        </select>
                        <div v-if="theErrors.title" class="mt-2 text-danger">
                            {{ theErrors.title[0] }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea
                            v-model="form.description"
                            class="form-control"
                            id="description"
                            rows="5"
                        ></textarea>
                        <div v-if="theErrors.title" class="mt-2 text-danger">
                            {{ theErrors.title[0] }}
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">
                        Create
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: [],
            subjects: [],
            theErrors: [],
            selected: "",
        };
    },

    mounted() {
        this.getSubjects();
        this.getNode();
    },

    methods: {
        async getSubjects() {
            let response = await axios.get("/api/subjects");
            if (response.status === 200) {
                this.subjects = response.data;
            }
        },

        async getNode() {
            let response = await axios.get(
                `/api/notes/${this.$route.params.noteSlug}`
            );
            this.form = response.data.data;
        },

        selectedSubject(e) {
            this.selected = e.target.value;
        },

        async update() {
            this.form["subject"] = this.selected || this.form.subjectId;
            let response = await axios.patch(
                `/api/notes/${this.$route.params.noteSlug}/edit`,
                this.form
            );
            if (response.status == 200) {
                this.$toasted.show(response.data.message, {
                    type: "success",
                    duration: 3000,
                });
                this.$router.push("/notes/table");
            }
        },
    },
};
</script>
