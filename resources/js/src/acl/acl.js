import Vue from "vue"
import {
    AclInstaller,
    AclCreate,
    AclRule
} from "vue-acl"
import router from "@/router"

Vue.use(AclInstaller)

let initialRole = 'guest';
// let initialRole = null;

let userInfo = JSON.parse(window.localStorage.getItem("userInfo"))
if (userInfo && userInfo.role) {
    initialRole = userInfo.role;
}
console.log("Current role: " + initialRole);

export default new AclCreate({
    initial: initialRole,
    notfound: "/admin/pages/not-authorized",
    router,
    acceptLocalRules: true,
    globalRules: {
        admin: new AclRule("admin").generate(),
        editor: new AclRule("admin").or("editor").generate(),
        // public: new AclRule("public").or("admin").or("editor").generate(),
        guest: new AclRule("guest").or("editor").or("admin").generate(),
    }
})
