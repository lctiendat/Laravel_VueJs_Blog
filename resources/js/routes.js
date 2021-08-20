import Welcome from "./components/member/Main.vue";
import ShowNews from "./components/member/Show.vue";
// import CategoryList from "./components/member/category/List.vue";
// import CategoryEdit from "./components/member/category/Edit.vue";
// import CategoryCreate from "./components/member/category/Add.vue";
import HomeAdmin from "./components/admin/Main.vue";
////////////////
import CategoryIndexAdmin from "./components/admin/category/Index.vue";
import CategoryCreateAdmin from "./components/admin/category/Create.vue";
import CategoryEditAdmin from "./components/admin/category/Edit.vue";
////////////
import NewsTypeIndexAdmin from "./components/admin/newstype/Index.vue";
import NewsTypeCreateAdmin from "./components/admin/newstype/Create.vue";
import NewsTypeEditAdmin from "./components/admin/newstype/Edit.vue";
//////////////////
import NewsIndexAdmin from "./components/admin/news/Index.vue";
import NewsCreateAdmin from "./components/admin/news/Create.vue";
import NewsEditAdmin from "./components/admin/news/Edit.vue";
export const routes = [
    {
        path: "/",
        component:Welcome,
        name:'defaultHome'
    },
    {
        path: "/:id/show",
        component: ShowNews,
        name:'showNews'
    },
    {
        path: "/panel",
        component: HomeAdmin,
        name: "homeAdmin",
        children: [
            //Category
            {
                path: "category",
                name: "CategoryIndexAdmin",
                component: CategoryIndexAdmin
            },
            {
                path: "category/create",
                name: "CategoryCreateAdmin",
                component: CategoryCreateAdmin
            },
            {
                path: "category/:id/edit",
                name: "CategoryEditAdmin",
                component: CategoryEditAdmin
            },
            // News type
            {
                path: "newstype",
                name: "NewsTypeIndexAdmin",
                component: NewsTypeIndexAdmin
            },
            {
                path: "newstype/create",
                name: "NewsTypeCreateAdmin",
                component: NewsTypeCreateAdmin
            },
            {
                path: "newstype/:id/edit",
                name: "NewsTypeEditAdmin",
                component: NewsTypeEditAdmin
            },
            {
                path: "news",
                name: "NewsIndexAdmin",
                component: NewsIndexAdmin
            },
            {
                path: "news/create",
                name: "NewsCreateAdmin",
                component: NewsCreateAdmin
            },
            {
                path: "news/:id/edit",
                name: "NewsEditAdmin",
                component: NewsEditAdmin
            }
        ]
    },
    {
        path: "*",
        redirect: "/404"
    }
];
