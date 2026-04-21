const path = require("path");

module.exports = {
  plugins: [
    require("postcss-import")({
      path: [
        path.resolve(__dirname, "node_modules"),
        path.resolve(process.cwd(), "node_modules"),
      ],
    }),
    require("postcss-nesting"),
    require("postcss-preset-env")({
      stage: 3,
      preserve: true,
      autoprefixer: false,
      features: {
        "custom-media-queries": true,
        "logical-properties-and-values": true,
      },
    }),
    require("autoprefixer"),
    // Only run cssnano (minification) when explicitly requested via env
    // e.g. `POSTCSS_MINIFY=true postcss ...`
    ...(process.env.POSTCSS_MINIFY === "true"
      ? [
          require("cssnano")({
            preset: "default",
          }),
        ]
      : []),
  ],
};
