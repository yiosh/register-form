module.exports = {
  // devServer: {
  //   disableHostCheck: true
  // },
  publicPath:
    process.env.NODE_ENV === "production" ? "/app/registrazione" : "/",
  indexPath: "index.php"
};
