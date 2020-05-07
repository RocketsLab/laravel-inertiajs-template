const theme = {
    background: 'bg-gray-800',
    menu: {
        background: 'bg-gray-800',
        icons: {
            active: 'fill-white',
            default: 'fill-teal-400 group-hover:fill-white'
        },
        titles: {
            active: 'text-white',
            default: 'text-teal-400 group-hover:text-white'
        }
    },
    login: {
        background: 'bg-teal-900'
    },
    dropdowns: {
        trigger: 'text-gray-700 group-hover:text-teal-600 focus:text-teal-600 mr-1 whitespace-no-wrap',
        chevronDown: 'w-5 h-5 group-hover:fill-teal-600 fill-gray-700 focus:fill-teal-600',
        item: 'block px-6 py-2 hover:bg-teal-500 hover:text-white',
        body: 'mt-2 py-2 shadow-xl bg-white rounded text-sm'
    }
};

const menus = [
    {
        route: '/',
        icon: 'dashboard',
        title: 'Home',
        isUrl: ''
    },
]

const options = {
    theme,
    menus
}

function install(Vue, defaultOptions) {
    Vue.prototype.$app = Object.assign(options, defaultOptions);
}

export default {
    install
}
