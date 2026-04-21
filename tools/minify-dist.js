const fs = require("fs").promises;
const path = require("path");
const postcss = require("postcss");
const cssnano = require("cssnano");

async function minifyDist() {
  const distDir = path.resolve(__dirname, "../resources/css/dist/v1");
  try {
    const files = await fs.readdir(distDir);
    for (const file of files) {
      if (!file.endsWith(".css") || file.endsWith(".min.css")) continue;
      const filePath = path.join(distDir, file);
      const css = await fs.readFile(filePath, "utf8");
      const result = await postcss([cssnano({ preset: "default" })]).process(
        css,
        {
          from: filePath,
        },
      );
      const outPath = path.join(distDir, file.replace(/\.css$/, ".min.css"));
      await fs.writeFile(outPath, result.css, "utf8");
      console.log(`Minified ${file} -> ${path.basename(outPath)}`);
    }
  } catch (err) {
    console.error("Minification failed:", err);
    process.exit(1);
  }
}

minifyDist();
