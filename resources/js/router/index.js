import Home from "../views/Home.vue";
import About from "../views/About.vue";
import Contact from "../views/Contact.vue";

import NewNote from "../views/notes/Create.vue";
import tableOfNote from "../views/notes/Table.vue";
import showTheNote from "../views/notes/Show.vue";
import editTheNote from "../views/notes/Edit.vue";
export default {
    mode: "history",
    linkActiveClass: "active",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home,
        },
        {
            path: "/about",
            name: "page.about",
            component: About,
        },
        {
            path: "/contact",
            name: "page.contact",
            component: Contact,
        },
        {
            path: "/notes/create",
            name: "notes.create",
            component: NewNote,
        },
        {
            path: "/notes/table",
            name: "notes.table",
            component: tableOfNote,
        },
        {
            path: "/notes/:noteSlug",
            name: "notes.show",
            component: showTheNote,
        },
        {
            path: "/notes/:noteSlug/edit",
            name: "notes.edit",
            component: editTheNote,
        },
    ],
};
