import '../QtModule.qbs' as QtModule

QtModule {
    qtModuleName: "AxServer"
    Depends { name: "Qt"; submodules: ["core","gui","widgets","axbase"]}

    architectures: ["x86_64"]
    targetPlatform: "windows"
    hasLibrary: true
    staticLibsDebug: ["shell32"]
    staticLibsRelease: ["shell32"]
    dynamicLibsDebug: []
    dynamicLibsRelease: []
    linkerFlagsDebug: []
    linkerFlagsRelease: []
    frameworksDebug: []
    frameworksRelease: []
    frameworkPathsDebug: []
    frameworkPathsRelease: []
    libNameForLinkerDebug: "Qt5AxServerd"
    libNameForLinkerRelease: "Qt5AxServer"
    libFilePathDebug: "D:/Qt/Qt5.13.2/5.13.2/mingw73_64/lib/libQt5AxServerd.a"
    libFilePathRelease: "D:/Qt/Qt5.13.2/5.13.2/mingw73_64/lib/libQt5AxServer.a"
    pluginTypes: []
    moduleConfig: ["lex","yacc","depend_includepath","testcase_targets","import_qpa_plugin","windows","qt_build_extra","file_copies","qmake_use","qt","warn_on","release","link_prl","debug_and_release","precompile_header","release","no_plugin_manifest","win32","mingw","gcc","copy_dir_files","sse2","aesni","sse3","ssse3","sse4_1","sse4_2","compile_examples","largefile","optimize_debug","precompile_header","rdrnd","shani","x86SimdAlways","prefix_build","force_independent","utf8_source","create_prl","link_prl","prepare_docs","qt_docs_targets","no_private_qt_headers_warning","QTDIR_build","qt_example_installs","exceptions_off","testcase_exceptions","release","ReleaseBuild","Release","build_pass","release","ReleaseBuild","Release","build_pass","static","no_module_headers","relative_qt_rpath","git_build","qmake_cache","target_qt","c++11","strict_c++","c++14","c++1z","c99","c11","need_fwd_pri","qt_install_module","debug_and_release","build_all","create_cmake","skip_target_version_ext","compiler_supports_fpmath","create_pc","release","ReleaseBuild","Release","build_pass","have_target","staticlib","exclusive_builds","no_autoqmake","thread","uic","opengl","moc","resources"]
    cpp.defines: ["QT_AXSERVER_LIB","QAXSERVER"]
    cpp.includePaths: []
    cpp.libraryPaths: ["C:/openssl/lib","C:/Utils/my_sql/mysql-5.7.25-winx64/lib","C:/Utils/postgresql/pgsql/lib","C:/openssl/lib","C:/Utils/my_sql/mysql-5.7.25-winx64/lib","C:/Utils/postgresql/pgsql/lib"]
    isStaticLibrary: true
Group {
        files: [Qt["axserver"].libFilePath]
        filesAreTargets: true
        fileTags: ["staticlibrary"]
    }
}
