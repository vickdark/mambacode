// Generates responsive WebP variants next to each source image: foo.png -> foo-640.webp, foo-1280.webp, foo-1920.webp.
// Only widths up to the original are produced; images narrower than the smallest width get a single same-size variant.
// Usage: node scripts/optimize-images.mjs  (needs `sharp`, e.g. `npx -p sharp node scripts/optimize-images.mjs`)
import { readdir, stat } from 'node:fs/promises';
import { join, extname } from 'node:path';
import sharp from 'sharp';

const WIDTHS = [640, 1280, 1920];
const SOURCES = ['public/img/products', 'public/img/mambacodelg-removebg.png'];

async function* walk(path) {
    if ((await stat(path)).isFile()) return yield path;
    for (const entry of await readdir(path, { withFileTypes: true })) {
        yield* walk(join(path, entry.name));
    }
}

let before = 0;
let after = 0;

for (const source of SOURCES) {
    for await (const file of walk(source)) {
        if (!/\.(png|jpe?g)$/i.test(file)) continue;

        const { width } = await sharp(file).metadata();
        const targets = WIDTHS.filter((w) => w <= width);
        if (!targets.length) targets.push(width);

        before += (await stat(file)).size;
        for (const w of targets) {
            const out = `${file.slice(0, -extname(file).length)}-${w}.webp`;
            const info = await sharp(file).resize({ width: w, withoutEnlargement: true }).webp({ quality: 80, effort: 5 }).toFile(out);
            if (w === targets.at(-1)) after += info.size;
        }
    }
}

console.log(`Largest variants: ${(before / 1e6).toFixed(1)} MB of PNG -> ${(after / 1e6).toFixed(1)} MB of WebP`);
