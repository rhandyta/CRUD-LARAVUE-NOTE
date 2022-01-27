<template>
    <div class="row col-md-6">
        <div class="card">
            <div class="card-header">New Note</div>
            <div class="card-body">
                <form action="#" method="post" @submit.prevent="store">
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
                            class="form-select"
                            v-model="form.subject"
                            id="subject"
                        >
                            <option
                                v-for="subject in subjects"
                                :key="subject.id"
                                :value="subject.id"
                            >
                                {{ subject.name }}
                            </option>
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
            form: {
                title: "",
                subject: "",
                description: "",
            },
            subjects: [],
            theErrors: [],
        };
    },

    mounted() {
        this.getSubjects();
    },

    methods: {
        async getSubjects() {
            let response = await axios.get("/api/subjects");
            if (response.status === 200) {
                this.subjects = response.data;
            }
        },

        async store() {
            try {
                let response = await axios.post(
                    "/api/notes/create-new-note",
                    this.form
                );
                if (response.status == 201) {
                    this.form.title = "";
                    this.form.subject = "";
                    this.form.description = "";
                    this.theErrors = [];
                    this.$toasted.show(response.data.message, {
                        type: "success",
                        duration: 3000,
                    });
                }
            } catch (e) {
                // this.theErrors = e.response.data.errors;
                this.$toasted.show("something went wrong", {
                    type: "error",
                    duration: 3000,
                });
            }
        },
    },
};
</script>
