import { route } from '../../../vendor/tightenco/ziggy/src/js/index.js'
import { Ziggy } from '../ziggy'
import '../../../axios';

function fetchData(routeName, param = {}, body = {}) {
    if (!getRoute().has(routeName))
        throw `"${routeName}" route name is not exists in ziggy routes!`;
    if (Ziggy.routes[routeName].methods.includes('GET'))
        return axios.get(getRoute(routeName, param));
    else if (Ziggy.routes[routeName].methods.includes('POST'))
        return axios.post(getRoute(routeName, param), body);
    else if (Ziggy.routes[routeName].methods.includes('PUT'))
        return axios.put(getRoute(routeName, param), body);
    else if (Ziggy.routes[routeName].methods.includes('PATCH'))
        return axios.patch(getRoute(routeName, param), body);
    else if (Ziggy.routes[routeName].methods.includes('DELETE'))
        return axios.delete(getRoute(routeName, param));
}

function getRoute(name, params = {}, absolute = true, config = Ziggy) {
    return route(name, params, absolute, config);
}

export {
    fetchData,
    getRoute
}
