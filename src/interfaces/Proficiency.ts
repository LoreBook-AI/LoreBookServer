import * as item from './item.js';

interface Ability {
    name: string;
    score: number;
    description: string;
}

interface language {
    name: string;
    description: string;
}

interface skill {
    name: string;
    hability: Ability;
    description: string;
}

interface proficiency {
    weapon?: item.weapon;
    tool?: item.tool;
    language?: language;
    armor?: item.armor;
    skill?: skill;
    instrument?: item.instrument;
}

export {
    Ability,
    proficiency
}
