export function makeMutations (types, func) {
  const mutations = {}
  types.forEach(type => {
    mutations[type] = func
  })
  return mutations
}
