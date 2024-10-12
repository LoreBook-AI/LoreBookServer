interface item {
    name: string;
    value: number;
    description: string;
    category: string;
}

interface weapon extends item {
    damageDice: number;
}

interface tool extends item {
    function: string;
}

interface armor extends item {
    baseAC: number;
}

interface instrument extends item {
    sound: string;
}

export {
    item,
    weapon,
    tool,
    armor,
    instrument
}
