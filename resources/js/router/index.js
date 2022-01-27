import Home from "../views/Home.vue";
import About from "../views/About.vue";
import Contact from "../views/Contact.vue";

import NewNote from "../views/notes/Create.vue";
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
            path: "/note/create",
            name: "notes.create",
            component: NewNote,
        },
    ],
};
